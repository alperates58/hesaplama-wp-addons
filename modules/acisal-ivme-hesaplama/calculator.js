function hcAIHesapla() {
    const wi = parseFloat(document.getElementById('hc-ai-wi').value);
    const wf = parseFloat(document.getElementById('hc-ai-wf').value);
    const t = parseFloat(document.getElementById('hc-ai-time').value);

    if (isNaN(wi) || isNaN(wf) || isNaN(t) || t <= 0) {
        alert('Lütfen geçerli değerler giriniz (Süre 0\'dan büyük olmalıdır).');
        return;
    }

    const alpha = (wf - wi) / t;

    document.getElementById('hc-ai-val').innerText = alpha.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' rad/s²';
    document.getElementById('hc-ai-result').classList.add('visible');
}
