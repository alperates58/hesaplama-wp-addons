function hcSensSpecHesapla() {
    const tp = parseFloat(document.getElementById('hc-ss-tp').value);
    const tn = parseFloat(document.getElementById('hc-ss-tn').value);
    const fp = parseFloat(document.getElementById('hc-ss-fp').value);
    const fn = parseFloat(document.getElementById('hc-ss-fn').value);

    if (isNaN(tp) || isNaN(tn) || isNaN(fp) || isNaN(fn)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const sensitivity = tp / (tp + fn);
    const specificity = tn / (tn + fp);
    const ppv = tp / (tp + fp);
    const npv = tn / (tn + fn);

    const fmt = (val) => isFinite(val) ? '%' + (val * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) : '-';

    document.getElementById('hc-res-ss-sens').innerText = fmt(sensitivity);
    document.getElementById('hc-res-ss-spec').innerText = fmt(specificity);
    document.getElementById('hc-res-ss-ppv').innerText = fmt(ppv);
    document.getElementById('hc-res-ss-npv').innerText = fmt(npv);

    document.getElementById('hc-duyarlilik-ve-ozgulluk-hesaplama-result').classList.add('visible');
}
