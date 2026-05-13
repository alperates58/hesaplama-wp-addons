function hcChangePtType() {
    const type = document.getElementById('hc-pt-type').value;
    document.getElementById('hc-pt-mean-inputs').style.display = type === 'mean' ? 'block' : 'none';
    document.getElementById('hc-pt-prop-inputs').style.display = type === 'prop' ? 'block' : 'none';
}

function hcNoktaTahminiHesapla() {
    const type = document.getElementById('hc-pt-type').value;
    const resultDiv = document.getElementById('hc-nokta-tahmini-hesaplama-result');
    let estimate = 0;
    let desc = "";

    if (type === 'mean') {
        const dataText = document.getElementById('hc-pt-data').value.trim();
        if (!dataText) { alert('Lütfen veri giriniz.'); return; }
        const nums = dataText.split(/[,;\s\t\n]+/).map(n => parseFloat(n)).filter(n => !isNaN(n));
        if (nums.length === 0) { alert('Geçerli sayılar giriniz.'); return; }
        estimate = nums.reduce((a, b) => a + b, 0) / nums.length;
        desc = `Popülasyon ortalaması (μ) için en iyi nokta tahmini, örneklem ortalamasıdır (x̄).`;
    } else {
        const x = parseFloat(document.getElementById('hc-pt-x').value);
        const n = parseFloat(document.getElementById('hc-pt-n').value);
        if (isNaN(x) || isNaN(n) || n <= 0) { alert('Lütfen x ve n değerlerini giriniz.'); return; }
        estimate = x / n;
        desc = `Popülasyon oranı (p) için en iyi nokta tahmini, örneklem oranıdır (p̂).`;
    }

    document.getElementById('hc-pt-res-val').innerText = estimate.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-pt-res-desc').innerText = desc;

    resultDiv.classList.add('visible');
}
