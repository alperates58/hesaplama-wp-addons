function hcChickenCookHesapla() {
    const weight = parseFloat(document.getElementById('hc-cc-weight').value);
    const method = document.getElementById('hc-cc-method').value;

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen ağırlığı giriniz.');
        return;
    }

    let mins = 0;
    let info = '';

    if (method === 'oven') {
        // 180°C fırın için yaklaşık: 45 dk/kg + 20 dk
        mins = (weight * 45) + 20;
        info = 'Tavuğun iç sıcaklığı en kalın yerinde 74°C olmalıdır. Pişirme sonrası 15 dk dinlendirin.';
    } else {
        // Haşlama için yaklaşık: 40 dk/kg
        mins = weight * 40;
        info = 'Kısık ateşte haşlama yapılması önerilir. Göğüs eti daha kısa sürede pişebilir.';
    }

    document.getElementById('hc-cc-res').innerText = Math.round(mins) + ' Dakika';
    document.getElementById('hc-cc-info').innerText = info;
    
    document.getElementById('hc-chicken-cook-result').classList.add('visible');
}
