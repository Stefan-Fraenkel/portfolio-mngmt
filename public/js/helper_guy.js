(function($) {

    var helper_style_left_percentage = 85;
    var helper_style_top_percentage = 25;
    let helper = document.createElement('div');
    helper.className = "logo";
    helper.id = "helper";
    helper.style.left = helper_style_left_percentage + "%";
    helper.style.top = helper_style_top_percentage + "%";
    helper.style.position = "absolute";
    helper.innerHTML = '<span class="icon fa-circle fa-2x"></span>';
    document.body.appendChild(helper);
    var helper_style_left_pixel = document.getElementById('helper').getBoundingClientRect().left;
    var helper_style_top_pixel = document.getElementById('helper').getBoundingClientRect().top;
    var pos_y = 0;
    var trail = [];
    var trail_counter = 1;
    var moving = false;

    window.addEventListener("resize", function () {
        document.getElementById('helper').style.left = helper_style_left_percentage + "%";
        helper_style_left_pixel = document.getElementById('helper').getBoundingClientRect().left;
        helper_style_top_pixel = document.getElementById('helper').getBoundingClientRect().top;
    });

    document.addEventListener("scroll", function () {
        stationary = false;
    });

    setInterval(function occasionalMove() {
        let helper = document.getElementById('helper');
        if(window.scrollY !== helper.getBoundingClientRect().top )
        {
            pos_y = window.scrollY;
            stationary = false;
            console.log(pos_y);
            console.log(helper.getBoundingClientRect().top);
        }
    }, 3000);

    var idleSpeed = 0;
    var idleWait = 0;
    function idleAnimation() {
        let distance = 4;

        if (idleSpeed > 12 && idleWait > 1000)
        {
            if (corner === 0)
            {
                helper.style.left = getOffset(helper).left + 1 + 'px';
                helper.style.top =  getOffset(helper).top - 1 + 'px';
                if (helper.getBoundingClientRect().left >= helper_style_left_pixel + distance)
                {
                    corner = 1;
                }
            }
            else if (corner === 1)
            {
                helper.style.left =  getOffset(helper).left + 1 + 'px';
                helper.style.top =  getOffset(helper).top + 1 + 'px';
                if (helper.getBoundingClientRect().left >= helper_style_left_pixel + distance*2){
                    corner = 2;
                }
            }
            else if (corner === 2)
            {
                helper.style.left =  getOffset(helper).left - 1 + 'px';
                helper.style.top =  getOffset(helper).top + 1 + 'px';
                if (helper.getBoundingClientRect().left <= helper_style_left_pixel + distance){
                    corner = 3;
                }
            }
            else if (corner === 3)
            {
                helper.style.left =  getOffset(helper).left - 1 + 'px';
                helper.style.top =  getOffset(helper).top - 1 + 'px';
                if (helper.getBoundingClientRect().left <= helper_style_left_pixel - distance){
                    corner = 4;
                }
            }
            else if (corner === 4)
            {
                helper.style.top =  getOffset(helper).top + 1 + 'px';
                helper.style.left =  getOffset(helper).left - 1 + 'px';
                if (helper.getBoundingClientRect().left <= helper_style_left_pixel - distance*2){
                    corner = 5;
                }
            }
            else if (corner === 5)
            {
                helper.style.top =  getOffset(helper).top + 1 + 'px';
                helper.style.left =  getOffset(helper).left + 1 + 'px';
                if (helper.getBoundingClientRect().left >= helper_style_left_pixel - distance){
                    corner = 6;
                }
            }
            else if (corner === 6)
            {
                helper.style.top =  getOffset(helper).top - 1 + 'px';
                helper.style.left =  getOffset(helper).left + 1 + 'px';
                if (helper.getBoundingClientRect().left >= helper_style_left_pixel){
                    corner = 0;
                    idleWait = 0;
                }
            }
            idleSpeed = 0;
        }
        idleSpeed++;
        idleWait++;
    }

    var t_counter = 0;


    var corner = 0;
    var stationary = false;
    setInterval(function mainLogic() {
        let helper = document.getElementById('helper');
        let spacer = 200;
        let speed = 1;
        let direction = 'down';
        moving = false
        if (stationary === false && getOffset(helper).top !== pos_y + spacer) {
            if (getOffset(helper).top >= pos_y + spacer - 1 && getOffset(helper).top <= pos_y + spacer + 1)
            {
                helper.style.top = pos_y + spacer + 'px';
                moving = false;
                stationary = true;
            }
            else if (getOffset(helper).top < pos_y + spacer - 1)
            {
                helper.style.top = getOffset(helper).top + speed + "px"
                console.log(helper.style.top);
                moving = true;
                stationary = false;
                idleWait = 0;
            }
           else if (getOffset(helper).top > pos_y + spacer + 1)
            {
                helper.style.top = getOffset(helper).top - speed + "px"
                moving = true;
                stationary = false;
                idleWait = 0;
                direction = 'up';
            }
        }
        else
        {
            idleAnimation();
        }
        if (moving === true && stationary === false && t_counter > 20 ) {
            let element = document.createElement('div');
            element.className = "trail";
            element.id = "trail" + trail_counter;
            if (direction === 'up')
            {
                element.style.left = getOffset(helper).left + 8 + "px";
                element.style.top = getOffset(helper).top + 38 + "px";
            }
            else
            {
                element.style.left = getOffset(helper).left + 8 + "px";
                element.style.top = getOffset(helper).top - 6 + "px";
            }
            element.style.position = "absolute";
            element.style.width = "100px";
            element.style.height = "100px";
            element.innerHTML = '<span class="icon fa-circle fa-2xs"></span>';
            element.style.backgroundPosition = 10 + 'px ' + 10 + 'px';
            document.body.appendChild(element);
            trail.push(["trail" + trail_counter]);
            trail_counter++;
            t_counter = 0;
        }
        t_counter++;
    }, 1);

    var timer = 0;
    setInterval(function(){
        if (trail.length > 5 || timer > 20 && trail.length > 0) {
            document.body.removeChild(document.getElementById(trail[0][0]))
            trail.shift();
            timer = 0;
        }
        timer++;
    }, 10);

    function getOffset(el) {
        const rect = el.getBoundingClientRect();
        return {
            left: rect.left + window.scrollX,
            top: rect.top + window.scrollY
        };
    }

})(jQuery);
