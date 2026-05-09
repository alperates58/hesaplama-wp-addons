function hcAndTipDegisti() {
    const type = document.getElementById('hc-al-type').value;
    const v1 = document.getElementById('hc-al-v1');
    const v2 = document.getElementById('hc-al-v2');
    
    if (type === 'binary') {
        v1.placeholder = 'Örn: 1010';
        v2.placeholder = 'Örn: 1100';
    } else {
        v1.placeholder = 'Örn: 10';
        v2.placeholder = 'Örn: 12';
    }
}

function hcAndHesapla() {
    const type = document.getElementById('hc-al-type').value;
    const v1Raw = document.getElementById('hc-al-v1').value.trim();
    const v2Raw = document.getElementById('hc-al-v2').value.trim();

    if (!v1Raw || !v2Raw) {
        alert('Lütfen her iki değeri de girin.');
        return;
    }

    let resultDec = 0;
    let resultBin = '';

    if (type === 'binary') {
        if (!/^[01]+$/.test(v1Raw) || !/^[01]+$/.test(v2Raw)) {
            alert('Lütfen sadece 0 ve 1 kullanın.');
            return;
        }
        
        // Pad shorter string with leading zeros
        const maxLen = Math.max(v1Raw.length, v2Raw.length);
        const s1 = v1Raw.padStart(maxLen, '0');
        const s2 = v2Raw.padStart(maxLen, '0');
        
        for (let i = 0; i < maxLen; i++) {
            resultBin += (s1[i] === '1' && s2[i] === '1') ? '1' : '0';
        }
        resultDec = parseInt(resultBin, 2);
    } else {
        const n1 = parseInt(v1Raw);
        const n2 = parseInt(v2Raw);
        
        if (isNaN(n1) || isNaN(n2)) {
            alert('Lütfen geçerli tam sayılar girin.');
            return;
        }
        
        resultDec = n1 & n2;
        resultBin = (resultDec >>> 0).toString(2);
    }

    document.getElementById('hc-res-al-val').innerText = resultDec.toLocaleString('tr-TR');
    document.getElementById('hc-res-al-bin').innerText = resultBin;

    document.getElementById('hc-al-result').classList.add('visible');
}
