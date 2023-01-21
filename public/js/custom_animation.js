(function($) {

    var bars = document.getElementsByClassName('skill-bar');

    setInterval(function ()
    {
        for (let bar of bars) {
            if (isInViewport(bar)){
                let level = bar.getAttribute('data-value');
                let percentage = parseInt(bar.style.width.substring(0,(bar.style.width.length - 1)));
                if (percentage < level){
                    const interval = setInterval(animateBar(bar, percentage, level), 10);
                    setTimeout(() => clearInterval(interval), 1);
                }
            }
        }
    }, 10);

    function animateBar(bar, percentage, level) {
        if (percentage < level) {
            bar.style.width = percentage + 1 + "%";
        }
    }

    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

})(jQuery);
