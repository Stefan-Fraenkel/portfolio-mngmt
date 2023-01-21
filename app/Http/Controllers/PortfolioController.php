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
        $profile = Profile::first();
        $profile->description = str_replace(' - ','&nbsp | &nbsp',$profile->description);
        $employments = Employment::all()->where('advertise', true)->take(3); // get max 3 entries to fit with template
        $employments = $this->formatDescription($employments);
        $projects = Project::all()->where('advertise', true)->take(4)->values(); // get max 4 entries to not clutter layout
        $projects = $this->formatDescription($projects);

        return view('solid-state.index')
            ->with('profile', $profile)
            ->with('trainings', Training::all()->where('advertise', true)->take(3)->values()) // get max 3 entries to not clutter layout
            ->with('expertises', Expertise::all()->where('advertise', true)->take(5)->values()) // get max 5 entries to not clutter layout
            ->with('employments', $employments->values()) // ->values() to reset collection keys
            ->with('projects', $projects->values());
    }

    private function formatDescription($collection)
    {
        foreach ($collection as $object)
        {
            $items = explode(' - ', $object->short_description);
            $i=0;
            foreach ($items as $item)
            {
                if ($i === 0)
                {
                    $object->short_description = $item;
                }
                else $object->short_description .= '<br>'.$item;
                $i++;
            }
        }
        return $collection;
    }
    public function cv()
    {
        $profile = Profile::first();
        $profile->description = str_replace(' - ','&nbsp | &nbsp',$profile->description);
        $employments = Employment::all()->where('advertise', true)->take(3); // get max 3 entries to fit with template
        $employments = $this->formatDescription($employments);
        $projects = Project::all()->where('advertise', true)->take(4)->values(); // get max 4 entries to not clutter layout
        $projects = $this->formatDescription($projects);

        return view('solid-state.index')
            ->with('profile', $profile)
            ->with('trainings', Training::all()->where('advertise', true)->take(3)->values()) // get max 3 entries to not clutter layout
            ->with('expertises', Expertise::all()->where('advertise', true)->take(5)->values()) // get max 5 entries to not clutter layout
            ->with('employments', $employments->values()) // ->values() to reset collection keys
            ->with('projects', $projects->values());
    }

    public function skills()
    {
        $profile = Profile::first();
        $profile->description = str_replace(' - ','&nbsp | &nbsp',$profile->description);
        return view('solid-state.skills')
            ->with('profile', $profile)
            ->with('expertises', Expertise::all()->values());
    }

    public function projects()
    {
        $profile = Profile::first();
        $profile->description = str_replace(' - ','&nbsp | &nbsp',$profile->description);
        $projects = Project::all()->values();
        $projects = $this->formatDescription($projects);
        return view('solid-state.projects')
            ->with('profile', $profile)
            ->with('projects', $projects->values());
    }

    public function employments()
    {
        $profile = Profile::first();
        $profile->description = str_replace(' - ','&nbsp | &nbsp',$profile->description);
        $employments = Employment::all();
        $employments = $this->formatDescription($employments);

        return view('solid-state.employments')
            ->with('profile', $profile)
            ->with('employments', $employments->values());
    }

    public function info()
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
                if ($value === 'TRUE')
                {
                    $value = true;
                }
                if ($value === 'FALSE')
                {
                    $value = false;
                }
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
