function hcIpAdresimNedir() {
    const ipVal = document.getElementById('hc-ip-val');
    ipVal.innerText = "Yükleniyor...";
    
    fetch('https://api.ipify.org?format=json')
        .then(response => response.json())
        .then(data => {
            ipVal.innerText = data.ip;
        })
        .catch(err => {
            ipVal.innerText = "Hata oluştu.";
            console.error(err);
        });
}
