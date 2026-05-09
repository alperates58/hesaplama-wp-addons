function hcTeaMeasureHesapla() {
    const people = parseInt(document.getElementById('hc-tm-people').value) || 0;
    if (people <= 0) return;

    // Kişi başı ~1.5 çay bardağı çay için:
    // 1 yemek kaşığı çay ~ 2-3 kişi için yeterlidir
    const teaSpoons = Math.ceil(people / 2.5);
    const waterCups = teaSpoons * 1.5;

    document.getElementById('hc-res-tm-tea').innerText = teaSpoons + ' Yemek Kaşığı';
    document.getElementById('hc-res-tm-water').innerText = waterCups.toFixed(1) + ' Bardak';
    
    document.getElementById('hc-tea-measure-result').classList.add('visible');
}
