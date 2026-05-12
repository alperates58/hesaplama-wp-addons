function hcHamurYagSetRatio() {
    const type = document.getElementById('hc-df-type').value;
    const customWrap = document.getElementById('hc-df-custom-wrap');
    if (type === 'custom') {
        customWrap.style.display = 'block';
    } else {
        customWrap.style.display = 'none';
        document.getElementById('hc-df-ratio').value = type;
    }
}

function hcHamurYagHesapla() {
    const flour = parseFloat(document.getElementById('hc-df-flour').value);
    const ratio = parseFloat(document.getElementById('hc-df-ratio').value);

    if (!flour || isNaN(ratio) || flour <= 0 || ratio < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const fat = (flour * ratio) / 100;

    const resultDiv = document.getElementById('hc-dough-fat-result');
    document.getElementById('hc-df-val').innerText = fat.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-df-note').innerText = `Hesaplama %${ratio} fırıncı yüzdesi baz alınarak yapılmıştır.`;
    
    resultDiv.classList.add('visible');
}
