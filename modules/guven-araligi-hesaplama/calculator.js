function hcConfidenceIntervalHesapla() {
    const mean = parseFloat(document.getElementById('hc-ci-mean').value);
    const std = parseFloat(document.getElementById('hc-ci-std').value);
    const n = parseInt(document.getElementById('hc-ci-n').value);
    const z = parseFloat(document.getElementById('hc-ci-level').value);

    if (isNaN(mean) || isNaN(std) || isNaN(n) || n <= 0 || std < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const marginOfError = z * (std / Math.sqrt(n));
    const lower = mean - marginOfError;
    const upper = mean + marginOfError;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-ci-range').innerText = `[${fmt(lower)} , ${fmt(upper)}]`;
    document.getElementById('hc-res-ci-lower').innerText = fmt(lower);
    document.getElementById('hc-res-ci-upper').innerText = fmt(upper);
    document.getElementById('hc-res-ci-margin').innerText = fmt(marginOfError);

    document.getElementById('hc-guven-araligi-result').classList.add('visible');
}
