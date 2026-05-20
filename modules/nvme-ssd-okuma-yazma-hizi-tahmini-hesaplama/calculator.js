function hcNvmeSsdOkumaYazmaHiziTahminiHesapla() {
    var gen = parseInt(document.getElementById('hc-nvme-gen').value);
    var lanes = parseInt(document.getElementById('hc-nvme-lanes').value);
    var kalite = parseFloat(document.getElementById('hc-nvme-kalite').value);

    // Saniye başına hat bant genişlikleri (MB/sn)
    var laneSpeeds = {
        3: 984.6,
        4: 1969.2,
        5: 3938.4,
        6: 7877.0
    };

    var teorikLimit = laneSpeeds[gen] * lanes;
    var okumaHizi = teorikLimit * kalite;
    
    // Yazma hızı genellikle okuma hızının %85-95'idir.
    var yazmaHizi = okumaHizi * 0.9;

    var fmtHiz = function(val) {
        if (val >= 1000) {
            return (val / 1000).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' GB/sn';
        }
        return Math.round(val).toLocaleString('tr-TR') + ' MB/sn';
    };

    document.getElementById('hc-nvme-res-teorik').textContent = fmtHiz(teorikLimit);
    document.getElementById('hc-nvme-res-okuma').textContent = fmtHiz(okumaHizi);
    document.getElementById('hc-nvme-res-yazma').textContent = fmtHiz(yazmaHizi);

    // 100 GB (102400 MB) dosya kopyalama simülasyonu
    var dosyaBoyutuMb = 102400;
    var sureSaniye = dosyaBoyutuMb / yazmaHizi;

    var sureText = '';
    if (sureSaniye < 1.0) {
        sureText = '100 GB büyüklüğünde bir dosya transferi yaklaşık ' + (sureSaniye * 1000).toFixed(0) + ' milisaniye sürer!';
    } else {
        sureText = '100 GB büyüklüğünde bir dosya transferi yaklaşık ' + sureSaniye.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' saniye sürer.';
    }

    document.getElementById('hc-nvme-res-simulasyon').textContent = sureText;
    document.getElementById('hc-nvme-speed-result').classList.add('visible');
}
