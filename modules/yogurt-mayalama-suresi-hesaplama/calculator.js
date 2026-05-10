function hcYogurtFermentHesapla() {
    const temp = parseFloat(document.getElementById('hc-yf-temp').value);

    let res = '';
    let info = '';

    if (temp < 40) {
        res = '8-10 Saat';
        info = 'Sıcaklık çok düşük, mayalanma yavaş gerçekleşir ve yoğurt cıvık olabilir.';
    } else if (temp <= 46) {
        res = '4-6 Saat';
        info = 'İdeal mayalama sıcaklığı. Yoğurt tam kıvamında ve tatlı olur.';
    } else {
        res = '3-4 Saat';
        info = 'Sıcaklık yüksek, yoğurt hızlı mayalanır ancak ekşi olma ihtimali yüksektir.';
    }

    document.getElementById('hc-yf-val').innerText = res;
    document.getElementById('hc-yf-info').innerText = info;
    document.getElementById('hc-yogurt-ferment-result').classList.add('visible');
}
