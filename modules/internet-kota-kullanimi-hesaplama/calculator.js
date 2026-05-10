function hcİnternetKotaKullanımıHesapla() {
    const total = parseFloat(document.getElementById('hc-quota-total').value);
    const fileVal = parseFloat(document.getElementById('hc-quota-file-val').value);
    const unit = document.getElementById('hc-quota-file-unit').value;

    if (!total || !fileVal) return;

    let fileSizeGB = unit === 'MB' ? fileVal / 1024 : fileVal;
    let remaining = total - fileSizeGB;

    document.getElementById('hc-quota-val').innerText = remaining.toFixed(2) + ' GB';
    document.getElementById('hc-quota-info').innerText = `Bu işlem kotanızın %${((fileSizeGB / total) * 100).toFixed(2)} kadarını tüketir.`;
    document.getElementById('hc-quota-result').classList.add('visible');
}
