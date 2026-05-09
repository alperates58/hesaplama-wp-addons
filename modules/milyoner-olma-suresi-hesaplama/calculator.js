function hcMilyonerHesapla() {
    const fv = parseFloat(document.getElementById('hc-ms-target').value) || 0;
    const p = parseFloat(document.getElementById('hc-ms-initial').value) || 0;
    const pmt = parseFloat(document.getElementById('hc-ms-monthly').value) || 0;
    const annualRate = parseFloat(document.getElementById('hc-ms-rate').value) / 100;

    if (pmt <= 0 && p <= 0) {
        alert('Lütfen birikim tutarlarını giriniz.');
        return;
    }

    const r = annualRate / 12;
    let months = 0;

    if (r === 0) {
        months = (fv - p) / pmt;
    } else {
        // n = log[ (FV*r + PMT) / (P*r + PMT) ] / log(1+r)
        const numerator = (fv * r + pmt);
        const denominator = (p * r + pmt);
        months = Math.log(numerator / denominator) / Math.log(1 + r);
    }

    if (months < 0) {
        document.getElementById('hc-ms-res-val').innerText = "Zaten Hedefe Ulaştınız!";
    } else {
        const years = Math.floor(months / 12);
        const remainingMonths = Math.ceil(months % 12);
        let text = "";
        if (years > 0) text += years + " Yıl ";
        text += remainingMonths + " Ay";
        document.getElementById('hc-ms-res-val').innerText = text;
    }

    document.getElementById('hc-millionaire-result').classList.add('visible');
}
