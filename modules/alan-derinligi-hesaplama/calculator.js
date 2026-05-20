function hcAlanDerinligiGuncelleCoC() {
    // Bu fonksiyon gerektiğinde ek işlemleri tetikleyebilir.
}

function hcAlanDerinligiHesapla() {
    var coc = parseFloat(document.getElementById('hc-dof-sensor').value);
    var focal = parseFloat(document.getElementById('hc-dof-focal').value); // mm
    var aperture = parseFloat(document.getElementById('hc-dof-aperture').value);
    var distanceM = parseFloat(document.getElementById('hc-dof-distance').value); // m
    
    if (isNaN(coc) || isNaN(focal) || isNaN(aperture) || isNaN(distanceM) || focal <= 0 || distanceM <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }
    
    // Milimetre cinsinden hesaplama
    var s = distanceM * 1000; // konu mesafesi mm
    var f = focal; // odak uzaklığı mm
    var N = aperture; // diyafram
    var c = coc; // bulanıklık dairesi mm
    
    // Hiperfokal mesafe (H) = (f^2 / (N * c)) + f
    var H = (Math.pow(f, 2) / (N * c)) + f;
    
    var nearLimit = 0;
    var farLimit = 0;
    var totalDof = 0;
    
    // Yakın Netlik Sınırı = s * (H - f) / (H + s - 2*f)
    nearLimit = (s * (H - f)) / (H + s - (2 * f));
    
    // Uzak Netlik Sınırı
    if (s >= (H - f)) {
        farLimit = Infinity;
    } else {
        // Uzak Netlik Sınırı = s * (H - f) / (H - s)
        farLimit = (s * (H - f)) / (H - s);
    }
    
    // Gösterim için metreye çeviriyoruz
    var nearM = nearLimit / 1000;
    var farM = farLimit === Infinity ? Infinity : farLimit / 1000;
    var hyperM = H / 1000;
    
    var nearStr = nearM.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' m';
    var farStr = farLimit === Infinity ? 'Sonsuz (∞)' : farM.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' m';
    var hyperStr = hyperM.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' m';
    
    var totalStr = "";
    if (farLimit === Infinity) {
        totalStr = "Sonsuz (∞)";
    } else {
        var totalM = farM - nearM;
        totalStr = totalM.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' m';
    }
    
    document.getElementById('hc-dof-near-val').innerText = nearStr;
    document.getElementById('hc-dof-far-val').innerText = farStr;
    document.getElementById('hc-dof-total-val').innerText = totalStr;
    document.getElementById('hc-dof-hyper-val').innerText = hyperStr;
    
    document.getElementById('hc-alan-derinligi-hesaplama-result').classList.add('visible');
}
