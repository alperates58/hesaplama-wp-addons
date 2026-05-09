function hcMeatCureHesapla() {
    const weight = parseFloat(document.getElementById('hc-mc-weight').value) || 0;
    const saltPerc = parseFloat(document.getElementById('hc-mc-salt').value) || 2.5;
    const useNitrite = document.getElementById('hc-mc-nitrite').value === 'yes';

    if (weight <= 0) return;

    const salt = weight * (saltPerc / 100);
    
    document.getElementById('hc-res-mc-salt').innerText = salt.toFixed(2) + ' gr';

    if (useNitrite) {
        const nit = weight * 0.0025; // Standard 0.25% for Cure #1
        document.getElementById('hc-res-mc-nit').innerText = nit.toFixed(2) + ' gr';
        document.getElementById('hc-mc-nit-res').style.display = 'flex';
    } else {
        document.getElementById('hc-mc-nit-res').style.display = 'none';
    }
    
    document.getElementById('hc-meat-cure-result').classList.add('visible');
}
