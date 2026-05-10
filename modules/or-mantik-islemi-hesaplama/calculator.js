function hcOrLogicHesapla() {
    const v1 = document.getElementById('hc-ol-val1').value.trim();
    const v2 = document.getElementById('hc-ol-val2').value.trim();

    if (!/^[01]+$/.test(v1) || !/^[01]+$/.test(v2)) {
        alert('Lütfen geçerli ikili (binary) değerler giriniz.');
        return;
    }

    const maxLen = Math.max(v1.length, v2.length);
    const b1 = v1.padStart(maxLen, '0');
    const b2 = v2.padStart(maxLen, '0');

    let result = '';
    for (let i = 0; i < maxLen; i++) {
        result += (b1[i] === '1' || b2[i] === '1') ? '1' : '0';
    }

    document.getElementById('hc-ol-res-val').innerText = result;
    document.getElementById('hc-or-logic-result').classList.add('visible');
}
