<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\Reference;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\EducationDescription;
use App\Models\Employment;
use App\Models\EmploymentDescription;
use App\Models\Expertise;
use App\Models\ExpertiseDescription;
use App\Models\Project;
use App\Models\ProjectDescription;
use App\Models\Training;
use App\Models\TrainingDescription;
use App\Models\Tag;
use App\Models\Profile;
use App\Models\ProfileImage;
use Illuminate\Support\Facades\Storage;


class PortfolioController extends Controller
{
    public function index()
    {
        $infos = [
            'educations' => Education::all(),
            'employments' => Employment::all(),
            'experises' => Expertise::all(),
            'projects' => Project::all(),
            'trainings' => Training::all()
        ];
        echo 'Overview:';
        foreach ($infos as $key => $info)
        {
            echo '<br><br><br>'.$key.':';
            foreach ($info as $entry)
            {
                echo '<br>';
                foreach ($entry->getAttributes() as $key => $value)
                {
                    echo '<br>'.$key.': '.$value;
                }
            }
        }
    }

    public function sendMail(Request $request)
    {
        dd($request);
    }

    public function addDescription($object, $array)
    {
        $object->descriptions()->saveMany($array);
    }

    public function addTag($object, $array)
    {
        $object->tags()->saveMany($array);
    }

    public function initialSetup()
    {
        foreach (Storage::disk('local')->allFiles('imports') as $path)
        {
            $type = explode('/', $path);
            $type = explode('.csv',end($type));
            $type = $type[array_key_first($type)];
            $this->writeDB($this->readCsv($path), $type);
        }
    }

    private function readCsv($path)
    {
        if (($file = fopen(storage_path('app\\' . $path), 'r')) !== false)
        {
            $keys = fgetcsv($file, 0, ',');
             while (($line = fgetcsv($file, 0, ',')) !== false)
             {
                 $csv[] = array_combine($keys, $line);
              }
        }
        fclose($file);
        if (isset($csv) && is_array($csv))
        {
            return $csv;
        }
        else return false;
    }

    private function writeDB($array, $type)
    {
        switch ($type) {
            case 'educations':
                $class = Education::class;
                break;
            case 'employments':
                $class = Employment::class;
                break;
            case 'expertises':
                $class = Expertise::class;
                break;
            case 'trainings':
                $class = Training::class;
                break;
            case 'projects':
                $class = Project::class;
                break;
            case 'tags':
                $class = Tag::class;
                break;
            case 'profiles':
                $class = Profile::class;
                break;
            case 'references':
                $class = Reference::class;
                break;
            case 'hobbies':
                $class = Hobby::class;
                break;
            default:
                return false;
        }
        foreach ($array as $element)
        {
            $row = $class::firstOrCreate(['name' => $element['name']]);
            foreach ($element as $key => $value)
            {
                if ($key == 'from' || $key == 'to')
                {
                    if (isset($value) && $value != null)
                    {
                        $value = Carbon::createFromFormat('d/m/Y', '01/'.$value);
                        if ($key == 'to')
                        {
                            $value = $value->endOfMonth();
                        }
                        $row->{$key} = $value;
                    }
                }
                else $row->{$key} = $value;
            }
            $row->save();
        }
    }
}
