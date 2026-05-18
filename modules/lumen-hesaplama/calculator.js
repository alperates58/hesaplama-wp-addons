function hcLumRoomChange() {
    const room = document.getElementById('hc-lum-room').value;
    const customGroup = document.getElementById('hc-lum-custom-lux-group');
    customGroup.style.display = room === 'custom' ? 'block' : 'none';
}

function hcLümenHesapla() {
    const area = parseFloat(document.getElementById('hc-lum-area').value);
    const roomSelect = document.getElementById('hc-lum-room').value;
    
    let lux = 150;
    if (roomSelect === 'custom') {
        lux = parseFloat(document.getElementById('hc-lum-lux').value);
    } else {
        lux = parseFloat(roomSelect);
    }

    if (!area || !lux || area <= 0 || lux <= 0) {
        alert('Lütfen alan ve lüks değerlerini pozitif sayılar olarak giriniz.');
        return;
    }

    // Lümen = Lux * Area
    const lumens = lux * area;

    // Ampul watt ihtiyaçları
    const ledW = lumens / 90;
    const cflW = lumens / 60;
    const incW = lumens / 15;

    document.getElementById('hc-lum-val').innerText = lumens.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' lm';
    document.getElementById('hc-lum-led-val').innerText = ledW.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' W';
    document.getElementById('hc-lum-cfl-val').innerText = cflW.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' W';
    document.getElementById('hc-lum-inc-val').innerText = incW.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' W';

    document.getElementById('hc-lumen-result').classList.add('visible');
}
