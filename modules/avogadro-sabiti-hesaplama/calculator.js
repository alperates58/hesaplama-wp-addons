const NA = 6.02214076e23;

function hcSwitchAvogadroTab(btn, mode) {
    document.querySelectorAll('.hc-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    document.querySelectorAll('.hc-av-panel').forEach(p => p.style.display = 'none');
    document.getElementById('hc-av-' + mode).style.display = 'block';
    document.getElementById('hc-avogadro-result').classList.remove('visible');
}

function hcAvogadroHesapla(mode) {
    const resVal = document.getElementById('hc-res-av-val');
    const resLabel = document.getElementById('hc-av-res-label');

    if (mode === 'm2p') {
        const mols = parseFloat(document.getElementById('hc-av-mols').value);
        if (isNaN(mols) || mols <= 0) { alert('Lütfen geçerli bir mol sayısı giriniz.'); return; }
        
        const particles = mols * NA;
        resVal.innerHTML = particles.toExponential(4).replace('e+', ' × 10<sup>') + '</sup> adet';
        resLabel.innerText = 'Tanecik Sayısı';
    } else {
        const partVal = parseFloat(document.getElementById('hc-av-part-val').value);
        const partExp = parseInt(document.getElementById('hc-av-part-exp').value);
        
        if (isNaN(partVal) || isNaN(partExp)) { alert('Lütfen tanecik sayısını doğru giriniz.'); return; }
        
        const particles = partVal * Math.pow(10, partExp);
        const mols = particles / NA;
        
        resVal.innerText = mols.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' mol';
        resLabel.innerText = 'Mol Sayısı';
    }

    document.getElementById('hc-avogadro-result').classList.add('visible');
    document.getElementById('hc-avogadro-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
