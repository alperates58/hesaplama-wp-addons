function hcSnowLenHesapla() {
    const height = parseFloat(document.getElementById('hc-sl-height').value);
    const style = document.getElementById('hc-sl-style').value;

    if (!height) {
        alert('Lütfen boyunuzu giriniz.');
        return;
    }

    // Basic formula: Snowboard length = Height * 0.88
    let len = height * 0.88;

    if (style === 'freestyle') len -= 3;
    if (style === 'freeride') len += 3;

    const resVal = document.getElementById('hc-sl-res-val');
    resVal.innerText = Math.round(len);

    document.getElementById('hc-snow-len-result').classList.add('visible');
}
