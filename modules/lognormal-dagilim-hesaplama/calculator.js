function hcLognormalHesapla() {
    const x = parseFloat(document.getElementById('hc-ln-x').value);
    const mu = parseFloat(document.getElementById('hc-ln-mu').value);
    const sigma = parseFloat(document.getElementById('hc-ln-sigma').value);

    if (isNaN(x) || isNaN(mu) || isNaN(sigma) || x <= 0 || sigma <= 0) {
        alert('Lütfen geçerli değerler girin (x > 0 ve σ > 0 olmalıdır).');
        return;
    }

    // PDF formula
    const pdf = (1 / (x * sigma * Math.sqrt(2 * Math.PI))) * 
                Math.exp(-Math.pow(Math.log(x) - mu, 2) / (2 * Math.pow(sigma, 2)));

    // Statistical measures
    const mean = Math.exp(mu + (Math.pow(sigma, 2) / 2));
    const variance = (Math.exp(Math.pow(sigma, 2)) - 1) * Math.exp(2 * mu + Math.pow(sigma, 2));
    const median = Math.exp(mu);

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });

    document.getElementById('hc-res-ln-pdf').innerText = fmt(pdf);
    document.getElementById('hc-res-ln-mean').innerText = fmt(mean);
    document.getElementById('hc-res-ln-var').innerText = fmt(variance);
    document.getElementById('hc-res-ln-median').innerText = fmt(median);

    document.getElementById('hc-lognormal-dagilim-result').classList.add('visible');
}
