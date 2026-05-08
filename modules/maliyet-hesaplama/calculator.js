function hcMaliyetHesapla() {
    const mat = parseFloat(document.getElementById('hc-maliyet-material').value) || 0;
    const lab = parseFloat(document.getElementById('hc-maliyet-labor').value) || 0;
    const ovh = parseFloat(document.getElementById('hc-maliyet-overhead').value) || 0;

    const total = mat + lab + ovh;
    
    if (total <= 0) {
        alert('Lütfen en az bir maliyet kalemi giriniz.');
        return;
    }

    const matP = (mat / total) * 100;
    const labP = (lab / total) * 100;

    document.getElementById('hc-maliyet-res-mat-p').innerText = '%' + matP.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-maliyet-res-lab-p').innerText = '%' + labP.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-maliyet-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-maliyet-result').classList.add('visible');
}
