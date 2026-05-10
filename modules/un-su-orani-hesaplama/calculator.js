function hcHydrationHesapla() {
    const flour = parseFloat(document.getElementById('hc-h-flour').value);
    const water = parseFloat(document.getElementById('hc-h-water').value);

    if (isNaN(flour) || isNaN(water) || flour <= 0) {
        alert('Lütfen un ve su miktarını giriniz.');
        return;
    }

    const ratio = (water / flour) * 100;

    document.getElementById('hc-h-val').innerText = '%' + ratio.toFixed(1);
    
    let info = '';
    if (ratio < 60) info = 'Sert Hamur (Simit, erişte vb. için).';
    else if (ratio <= 70) info = 'Standart Hamur (Ekmek, pizza vb. için ideal).';
    else info = 'Cıvık Hamur (Ciabatta, focaccia gibi gözenekli ekmekler için).';

    document.getElementById('hc-h-info').innerText = info;
    document.getElementById('hc-hydration-result').classList.add('visible');
}
