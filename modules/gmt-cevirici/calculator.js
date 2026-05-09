function hcGMTCevir() {
    const localVal = document.getElementById('hc-gmt-local').value;
    if (!localVal) { alert('Lütfen bir zaman seçin.'); return; }

    const date = new Date(localVal);
    // toGMTString is deprecated but identical to toUTCString in most browsers.
    // We'll use toUTCString and just label it as GMT for the user.
    const gmtStr = date.toUTCString().replace('UTC', 'GMT');

    document.getElementById('hc-gmt-val').innerText = gmtStr;
    document.getElementById('hc-gmt-result').classList.add('visible');
}
