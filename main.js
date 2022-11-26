const add=()=>
{
    cartNumber()
}

const cartNumber=()=>
{
    let productNumbers=localStorage.getItem('cartNumbers');
    
    productNumbers=parseInt(productNumbers);

    if(productNumbers)
    {
        localStorage.setItem('cartNumbers' , productNumbers +1);
        document.querySelector('.topnav-right span').textContent= productNumbers + 1;
    }
    else
    {
        localStorage.setItem('cartNumbers' , 1);
        document.querySelector('.topnav-right span').textContent= 1;
    }    
}