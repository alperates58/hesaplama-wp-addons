function hcVitaminDHesapla() {
    const yas = parseFloat(document.getElementById('hc-vd-yas').value);

    if (isNaN(yas)) {
        alert('Lütfen yaşınızı girin.');
        return;
    }

    let rdaIU = 0;
    let rdaMCG = 0;

    if (yas < 1) {
        rdaIU = 400;
        rdaMCG = 10;
    } else if (yas <= 70) {
        rdaIU = 600;
        rdaMCG = 15;
    } else {
        rdaIU = 800;
        rdaMCG = 20;
    }

    document.getElementById('hc-vd-value').innerText = 
        rdaIU.toLocaleString('tr-TR') + ' IU (' + rdaMCG.toLocaleString('tr-TR') + ' mcg)';
    
    document.getElementById('hc-vit-d-result').classList.add('visible');
}
