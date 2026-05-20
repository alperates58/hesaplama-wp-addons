function hcPsuGucTuketimiHesapla() {
    var cpu = parseFloat(document.getElementById('hc-psu-cpu').value);
    var gpu = parseFloat(document.getElementById('hc-psu-gpu').value) || 0;
    var ram = parseFloat(document.getElementById('hc-psu-ram').value) || 0;
    var disk = parseFloat(document.getElementById('hc-psu-disk').value) || 0;
    var fan = parseFloat(document.getElementById('hc-psu-fan').value) || 0;
    var ocFactor = parseFloat(document.getElementById('hc-psu-oc').value);

    if (isNaN(cpu) || cpu <= 0 || gpu < 0 || ram < 0 || disk < 0 || fan < 0) {
        alert('Lütfen geçerli donanım güç ve adet değerleri girin.');
        return;
    }

    // Ek sabit yükler: Anakart + Çevre Birimleri = ~50 Watt
    var anakartYuk = 50;
    var ramYuk = ram * 4; // DDR4/DDR5 modül başına ortalama ~4W
    var diskYuk = disk * 6; // Ortalama SSD/HDD başı ~6W
    var fanYuk = fan * 3; // Fan + RGB başı ~3W

    var toplamTdp = cpu + gpu + anakartYuk + ramYuk + diskYuk + fanYuk;
    var onerilenRaw = toplamTdp * ocFactor;

    // Önerilen PSU değerini en yakın 50'lik basamağa yuvarla (min 450W)
    var onerilenPsu = Math.ceil(onerilenRaw / 50) * 50;
    if (onerilenPsu < 450) {
        onerilenPsu = 450;
    }

    var fmtWatt = function(val) {
        return Math.round(val).toLocaleString('tr-TR') + ' W';
    };

    document.getElementById('hc-psu-res-temel').textContent = fmtWatt(toplamTdp - cpu - gpu) + ' (Anakart, RAM, Disk, Fan vb.)';
    document.getElementById('hc-psu-res-toplam').textContent = fmtWatt(toplamTdp);
    document.getElementById('hc-psu-res-onerilen').textContent = fmtWatt(onerilenPsu);

    var sertifika = '';
    if (onerilenPsu < 550) {
        sertifika = '80 Plus Bronze veya Standart';
    } else if (onerilenPsu >= 550 && onerilenPsu < 750) {
        sertifika = '80 Plus Gold (En Verimli / Fiyat-Performans)';
    } else {
        sertifika = '80 Plus Platinum / Titanium (Yüksek Güç ve Verimlilik)';
    }

    document.getElementById('hc-psu-res-sertifika').textContent = sertifika;
    document.getElementById('hc-psu-guc-tuketimi-result').classList.add('visible');
}
