function hcBaiHesapla() {
    const boy = parseFloat(document.getElementById('hc-bai-boy').value) / 100; // m
    const kalca = parseFloat(document.getElementById('hc-bai-kalca').value);

    if (isNaN(boy) || isNaN(kalca) || boy <= 0 || kalca <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // BAI = (Hip / Height^1.5) - 18
    const bai = (kalca / Math.pow(boy, 1.5)) - 18;

    document.getElementById('hc-res-bai-val').innerText = bai.toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    let info = '';
    if (bai < 8) info = 'Yetersiz Yağ';
    else if (bai < 21) info = 'Sağlıklı';
    else if (bai < 26) info = 'Fazla Kilolu';
    else info = 'Obezite';

    document.getElementById('hc-res-bai-info').innerText = info;
    document.getElementById('hc-bai-result').classList.add('visible');
}
