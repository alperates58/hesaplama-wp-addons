function hcSodyumHesapla() {
    const saltInput = document.getElementById('hc-ss-salt');
    const sodiumInput = document.getElementById('hc-ss-sodium');
    const resultBox = document.getElementById('hc-salt-sodium-result');
    const valueBox = document.getElementById('hc-ss-value');

    const salt = parseFloat(saltInput.value);
    const sodium = parseFloat(sodiumInput.value);

    // Eğer tuz girilmişse sodyumu hesapla, sodyum girilmişse tuzu hesapla
    if (!isNaN(salt)) {
        const resSodium = salt * 400;
        sodiumInput.value = Math.round(resSodium);
        valueBox.innerText = Math.round(resSodium).toLocaleString('tr-TR') + ' mg Sodyum';
    } else if (!isNaN(sodium)) {
        const resSalt = sodium / 400;
        saltInput.value = resSalt.toFixed(2);
        valueBox.innerText = resSalt.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' g Tuz';
    } else {
        alert('Lütfen bir değer girin.');
        return;
    }

    resultBox.classList.add('visible');
}
