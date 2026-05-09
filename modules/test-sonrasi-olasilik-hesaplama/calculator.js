function hcPostTestHesapla() {
    const preProb = (parseFloat(document.getElementById('hc-pt-pre').value) || 0) / 100;
    const lr = parseFloat(document.getElementById('hc-pt-lr').value) || 1;

    if (preProb >= 1) {
        document.getElementById('hc-res-pt-val').innerText = '%100';
        return;
    }

    // 1. Pre-test odds
    const preOdds = preProb / (1 - preProb);
    // 2. Post-test odds
    const postOdds = preOdds * lr;
    // 3. Post-test prob
    const postProb = postOdds / (1 + postOdds);

    document.getElementById('hc-res-pt-val').innerText = '%' + (postProb * 100).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-post-test-result').classList.add('visible');
}
