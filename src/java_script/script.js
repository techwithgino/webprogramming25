function validatingForm(){
    const email=document.getElementById('email').value;
    if(!email.includes('@')){
        alert('Invalid email address. Please check your email.')
        return false;
    }
    return true;
}