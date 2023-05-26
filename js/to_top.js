window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        document.getElementById("scrollUp").style.display = "block";
        document.getElementById("scrollUp").style.opacity = 0.1;
        if (document.body.scrollTop > 220 || document.documentElement.scrollTop > 220) {
            document.getElementById("scrollUp").style.opacity = 0.2;
            if (document.body.scrollTop > 240 || document.documentElement.scrollTop > 240) {
                document.getElementById("scrollUp").style.opacity = 0.4;
                if (document.body.scrollTop > 260 || document.documentElement.scrollTop > 260) {
                    document.getElementById("scrollUp").style.opacity = 0.6;
                    if (document.body.scrollTop > 280 || document.documentElement.scrollTop > 280) {
                        document.getElementById("scrollUp").style.opacity = 0.8;
                        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                            document.getElementById("scrollUp").style.opacity = 1;
                        }
                        else{
                            document.getElementById("scrollUp").style.opacity = 0.8;
                        }
                    }
                    else{
                        document.getElementById("scrollUp").style.opacity = 0.6;
                    }
                }
                else{
                    document.getElementById("scrollUp").style.opacity = 0.4;
                }
            }
            else{
                document.getElementById("scrollUp").style.opacity = 0.2;
            }
        }
        else{
            document.getElementById("scrollUp").style.opacity = 0.1;
        }
    }
    else {
        document.getElementById("scrollUp").style.display = "none";
    }
}

function scrollUp() {
    document.body.scrollTo({top: 0, behavior: 'smooth'});
    document.documentElement.scrollTo({top: 0, behavior: 'smooth'});
}
