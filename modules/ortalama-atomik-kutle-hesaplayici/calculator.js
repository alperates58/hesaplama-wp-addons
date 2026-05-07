function hcOrtalamaAtomikKutleHesapla() {
    const m1 = parseFloat(document.getElementById('hc-iso-m1').value) || 0;
    const p1 = parseFloat(document.getElementById('hc-iso-p1').value) || 0;
    const m2 = parseFloat(document.getElementById('hc-iso-m2').value) || 0;
    const p2 = parseFloat(document.getElementById('hc-iso-p2').value) || 0;
    const m3 = parseFloat(document.getElementById('hc-iso-m3').value) || 0;
    const p3 = parseFloat(document.getElementById('hc-iso-p3').value) || 0;

    const totalP = p1 + p2 + p3;
    
    if (totalP === 0) {
        alert('Lütfen en az bir izotop için kütle ve bolluk giriniz.');
        return;
    }

    // Ortalama Kütle = (m1*p1 + m2*p2 + m3*p3) / totalP
    const avgMass = (m1 * p1 + m2 * p2 + m3 * p3) / totalP;

    document.getElementById('hc-res-avg-mass').innerText = avgMass.toLocaleString('tr-TR', { 
        minimumFractionDigits: 4, 
        maximumFractionDigits: 6 
    });

    const warn = document.getElementById('hc-p-warn');
    const totalPText = document.getElementById('hc-total-p');
    if (Math.abs(totalP - 100) > 0.01) {
        warn.style.display = 'block';
        totalPText.innerText = totalP.toFixed(2);
    } else {
        warn.style.display = 'none';
    }

    document.getElementById('hc-atom-mass-result').classList.add('visible');
    document.getElementById('hc-atom-mass-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
