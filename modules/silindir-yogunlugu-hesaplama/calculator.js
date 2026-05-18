function hcSilindirYoğunluguHesapla() {
    var r = parseFloat(document.getElementById('hc-siy-r').value); // cm
    var h = parseFloat(document.getElementById('hc-siy-h').value); // cm
    var m = parseFloat(document.getElementById('hc-siy-m').value); // kg

    if (isNaN(r) || r <= 0) {
        alert('Lütfen geçerli bir yarıçap değeri girin.');
        return;
    }
    if (isNaN(h) || h <= 0) {
        alert('Lütfen geçerli bir yükseklik değeri girin.');
        return;
    }
    if (isNaN(m) || m <= 0) {
        alert('Lütfen geçerli bir kütle değeri girin.');
        return;
    }

    // Volume V = pi * r^2 * h
    var Vcm3 = Math.PI * Math.pow(r, 2) * h;
    var Vlitre = Vcm3 / 1000;
    var Vm3 = Vcm3 / 1e6;

    // Density rho = m / V
    var rhoKgm3 = m / Vm3;
    var rhoGcm3 = rhoKgm3 / 1000; // 1 g/cm3 = 1000 kg/m3

    document.getElementById('hc-siy-res-v-cm3').innerText = Vcm3.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' cm³';
    document.getElementById('hc-siy-res-v-l').innerText = Vlitre.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' L';
    document.getElementById('hc-siy-res-rho-gcm3').innerText = rhoGcm3.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' g/cm³';
    document.getElementById('hc-siy-res-rho-kgm3').innerText = rhoKgm3.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg/m³';

    var desc = 'Yarıçapı ' + r.toLocaleString('tr-TR') + ' cm ve yüksekliği ' + h.toLocaleString('tr-TR') + ' cm olan silindirin toplam hacmi ' + Vcm3.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' cm³\'tür. Bu hacimde ' + m.toLocaleString('tr-TR') + ' kg kütleye sahip silindir malzemenin yoğunluğu ' + rhoKgm3.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg/m³ olarak hesaplanmıştır.';
    document.getElementById('hc-siy-desc').innerText = desc;

    document.getElementById('hc-silindir-yogunlugu-hesaplama-result').classList.add('visible');
}
