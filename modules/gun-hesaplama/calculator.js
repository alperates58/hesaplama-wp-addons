function hcGunHesapla() {
    const weeks = parseFloat(document.getElementById('hc-g-weeks').value) || 0;
    const months = parseFloat(document.getElementById('hc-g-months').value) || 0;
    
    const totalDays = (weeks * 7) + (months * 30);

    document.getElementById('hc-g-val').innerText = totalDays.toLocaleString('tr-TR') + " Gün";
    document.getElementById('hc-g-result').classList.add('visible');
}
