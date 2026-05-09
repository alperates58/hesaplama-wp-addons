function hcBKHesapla() {
    const offset = parseFloat(document.getElementById('hc-bk-offset').value);
    const angleDeg = parseFloat(document.getElementById('hc-bk-angle').value);

    if (isNaN(offset) || offset <= 0) {
        alert('Lütfen geçerli bir ofset mesafesi giriniz.');
        return;
    }

    const angleRad = angleDeg * (Math.PI / 180);
    
    // Travel = Offset / sin(Angle)
    const travel = offset / Math.sin(angleRad);
    // Run = Offset / tan(Angle)
    const run = offset / Math.tan(angleRad);

    document.getElementById('hc-bk-travel').innerText = travel.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm';
    document.getElementById('hc-bk-run').innerText = run.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm';
    
    document.getElementById('hc-bk-result').classList.add('visible');
}
