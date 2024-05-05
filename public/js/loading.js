function hideLoadingScreen() {
    setTimeout(() => {
        document.getElementById('loadingScreen').style.display = 'none';
        document.getElementById('content').style.display = 'block';
    }, 3000); 
}
window.addEventListener('load', hideLoadingScreen);