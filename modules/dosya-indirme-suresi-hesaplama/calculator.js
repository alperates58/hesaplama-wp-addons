function hcDosyaIndirmeSuresiHesapla() {
    var boyut = parseFloat(document.getElementById('hc-dis-boyut').value);
    var birim = document.getElementById('hc-dis-boyut-birim').value;
    var hiz = parseFloat(document.getElementById('hc-dis-hiz').value);
    var verim = parseFloat(document.getElementById('hc-dis-verim').value);

    if (isNaN(boyut) || boyut <= 0 || isNaN(hiz) || hiz <= 0) {
        alert('Lütfen geçerli dosya boyutu ve indirme hızı değerleri girin.');
        return;
    }

    // Dosya boyutunu Megabayt (MB) cinsine çevir
    var boyutMb = boyut;
    if (birim === 'GB') {
        boyutMb = boyut * 1024;
    } else if (birim === 'TB') {
        boyutMb = boyut * 1024 * 1024;
    }

    // Hızı Megabit/sn'den Megabayt/sn'ye çevir (1 Bayt = 8 Bit) ve ağ verimliliğiyle çarp
    var efektifHizMb = (hiz / 8) * verim;

    // Süre saniye cinsinden
    var sureSaniye = boyutMb / efektifHizMb;

    var formatSure = function(sec) {
        var s = Math.floor(sec % 60);
        var m = Math.floor((sec / 60) % 60);
        var h = Math.floor(sec / 3600);

        var res = [];
        if (h > 0) res.push(h + ' saat');
        if (m > 0) res.push(m + ' dakika');
        if (s > 0 || res.length === 0) res.push(s + ' saniye');
        return res.join(' ');
    };

    var fmtSayi = function(val, dec) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    };

    document.getElementById('hc-dis-res-boyut-mb').textContent = fmtSayi(boyutMb, 0) + ' MB';
    document.getElementById('hc-dis-res-saniye-hiz').textContent = fmtSayi(efektifHizMb, 2) + ' MB/sn';
    document.getElementById('hc-dis-res-sure').textContent = formatSure(sureSaniye);

    document.getElementById('hc-download-time-result').classList.add('visible');
}
