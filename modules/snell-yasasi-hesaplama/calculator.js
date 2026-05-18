function hcSnellYasasiHesapla() {
    var n1 = parseFloat(document.getElementById('hc-sny-n1').value);
    var n2 = parseFloat(document.getElementById('hc-sny-n2').value);
    var theta1Deg = parseFloat(document.getElementById('hc-sny-theta1').value);

    if (isNaN(n1) || n1 < 1.0 || isNaN(n2) || n2 < 1.0) {
        alert('Kırılma indisleri en az 1.0 (vakum/hava) olmalıdır.');
        return;
    }
    if (isNaN(theta1Deg) || theta1Deg < 0 || theta1Deg > 90) {
        alert('Gelme açısı 0 ile 90 derece arasında olmalıdır.');
        return;
    }

    var theta1Rad = (theta1Deg * Math.PI) / 180;
    
    // Critical angle: thetac = arcsin(n2 / n1) (Only if n1 > n2)
    var criticalAngleDeg = null;
    if (n1 > n2) {
        criticalAngleDeg = (Math.asin(n2 / n1) * 180) / Math.PI;
    }

    // Snell's Law: sin(theta2) = (n1 * sin(theta1)) / n2
    var sinTheta2 = (n1 * Math.sin(theta1Rad)) / n2;

    var theta2DegStr = '-';
    var behavior = '';
    var desc = '';

    if (sinTheta2 > 1.0) {
        theta2DegStr = 'Yok';
        behavior = 'Tam Yansıma (Total Internal Reflection)';
        desc = n1.toLocaleString('tr-TR') + ' indisli yoğun ortamdan ' + n2.toLocaleString('tr-TR') + ' indisli az yoğun ortama geçmek isteyen ışık, ' + theta1Deg.toLocaleString('tr-TR') + '° gelme açısıyla ' + criticalAngleDeg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + '° kritik açısını aştığı için diğer ortama geçemez ve tam yansımaya uğrar.';
    } else {
        var theta2Rad = Math.asin(sinTheta2);
        var theta2Deg = (theta2Rad * 180) / Math.PI;
        theta2DegStr = theta2Deg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + '°';
        
        if (n1 < n2) {
            behavior = 'Normala Yaklaşarak Kırılma';
            desc = 'Işık az yoğun ortamdan (' + n1.toLocaleString('tr-TR') + ') çok yoğun ortama (' + n2.toLocaleString('tr-TR') + ') geçtiği için hızı yavaşlar ve normal çizgisine yaklaşarak kırılır. Kırılma açısı ' + theta2Deg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + '° olarak gerçekleşir.';
        } else if (n1 > n2) {
            behavior = 'Normalden Uzaklaşarak Kırılma';
            desc = 'Işık çok yoğun ortamdan (' + n1.toLocaleString('tr-TR') + ') az yoğun ortama (' + n2.toLocaleString('tr-TR') + ') geçtiği için hızı artar ve normal çizgisinden uzaklaşarak kırılır. Kırılma açısı ' + theta2Deg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + '° olarak gerçekleşir.';
        } else {
            behavior = 'Kırılmadan Doğrusal Geçiş';
            desc = 'Her iki ortamın kırılma indisi eşit olduğu için ışık hiçbir kırılmaya uğramadan ' + theta1Deg.toLocaleString('tr-TR') + '° açı ile yoluna aynen devam eder.';
        }
    }

    document.getElementById('hc-sny-res-theta2').innerText = theta2DegStr;
    document.getElementById('hc-sny-res-thetac').innerText = criticalAngleDeg !== null ? criticalAngleDeg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + '°' : 'Hesaplanamaz (n₁ ≤ n₂)';
    document.getElementById('hc-sny-res-behavior').innerText = behavior;
    document.getElementById('hc-sny-desc').innerText = desc;

    document.getElementById('hc-snell-yasasi-hesaplama-result').classList.add('visible');
}
