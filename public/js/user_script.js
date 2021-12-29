function showLogoutBtn(){
    document.getElementById('LogoutBtn').classList.toggle('showLogout');
}

window.onclick = function(event) {
    let LogoutBtn = document.getElementById('LogoutBtn');
    if (event.target != document.getElementById('Logout')) {
        LogoutBtn.classList.remove('showLogout');
    }
}

if (document.body.contains(document.getElementById("slide_0")))
{
    let Radio = document.getElementsByClassName('slider_radio');
    let ActiveIndex = 0;
    for(let i=0; i<Radio.length; i++)
    {
        if(Radio[i].checked)
        {
            ActiveIndex = i;
        }
    }
    CardSelected(ActiveIndex);
}

function CardSelected(ActiveIndex)
{
    
    let Radio   = document.getElementsByClassName('slider_radio');
    let Cards   = document.getElementsByClassName('slider-item');

    if(ActiveIndex>0)
    {
        let left1   = ActiveIndex-1;
        
        Cards[left1].className          = "slider-item slider-item-left1";

        if(ActiveIndex>1)
        {
            let left2   = ActiveIndex-2;
            for(let i=0; i<left2; i++)
            {
                Cards[i].className = "slider-item hidden-slide";
            }
            
            Cards[left2].className          = "slider-item slider-item-left2";
        }
    }

    if(ActiveIndex < Radio.length-1)
    {
        let right1 = ActiveIndex+1;
        
        Cards[right1].className         = "slider-item slider-item-right1";

        if(ActiveIndex < Radio.length-2)
        {
            let right2  = ActiveIndex+2;
            for(let i=right2+1; i<Radio.length; i++)
            {
                Cards[i].className = "slider-item hidden-slide";
            }
            Cards[right2].className         = "slider-item slider-item-right2";
        }
    }

    Cards[ActiveIndex].className    = "slider-item active-slider";
    
}