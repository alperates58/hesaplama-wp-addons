function hcUTCCevir() {
    const localVal = document.getElementById('hc-utc-local').value;
    if (!localVal) { alert('Lütfen bir zaman seçin.'); return; }

    const date = new Date(localVal);
    const utcStr = date.toUTCString();

    document.getElementById('hc-utc-val').innerText = utcStr;
    document.getElementById('hc-utc-result').classList.add('visible');
}
