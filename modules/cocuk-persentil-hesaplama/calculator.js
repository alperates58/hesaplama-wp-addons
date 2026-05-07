const hcCocukData = {
    erkek: {
        kilo: { 2: [10, 12.5, 15], 5: [14, 18, 24], 10: [24, 32, 45], 15: [40, 56, 80], 18: [52, 70, 95] },
        boy: { 2: [82, 87, 93], 5: [100, 110, 120], 10: [125, 138, 150], 15: [155, 170, 185], 18: [165, 176, 188] },
        bmi: { 2: [14.5, 16.5, 19], 5: [13.5, 15.5, 18], 10: [14, 16.5, 22], 15: [16.5, 20, 26], 18: [18.5, 23, 30] }
    },
    kadin: {
        kilo: { 2: [9, 12, 14.5], 5: [13, 18, 23], 10: [23, 33, 47], 15: [38, 52, 75], 18: [45, 58, 85] },
        boy: { 2: [80, 86, 92], 5: [100, 109, 118], 10: [125, 138, 150], 15: [150, 162, 175], 18: [155, 163, 173] },
        bmi: { 2: [14, 16, 18.5], 5: [13, 15, 18.5], 10: [13.5, 17, 23], 15: [16.5, 20.5, 27], 18: [17.5, 22, 29] }
    }
};

function interpolateChildValue(age, data) {
    const ages = Object.keys(data).map(Number).sort((a, b) => a - b);
    if (data[age]) return data[age];

    let low = ages[0], high = ages[ages.length - 1];
    for (let i = 0; i < ages.length; i++) {
        if (ages[i] < age) low = ages[i];
        if (ages[i] > age) { high = ages[i]; break; }
    }

    const factor = (age - low) / (high - low);
    const lowVals = data[low];
    const highVals = data[high];

    return [
        lowVals[0] + (highVals[0] - lowVals[0]) * factor,
        lowVals[1] + (highVals[1] - lowVals[1]) * factor,
        lowVals[2] + (highVals[2] - lowVals[2]) * factor
    ];
}

function hcCocukPersentilHesapla() {
    const cinsiyet = document.getElementById('hc-cp-cinsiyet').value;
    const yas = parseInt(document.getElementById('hc-cp-yas').value);
    const kilo = parseFloat(document.getElementById('hc-cp-kilo').value);
    const boy = parseFloat(document.getElementById('hc-cp-boy').value);

    if (isNaN(yas) || isNaN(kilo) || isNaN(boy)) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    if (yas < 2 || yas > 18) {
        alert('Bu araç 2-18 yaş arası çocuklar ve ergenler içindir.');
        return;
    }

    const bmi = kilo / Math.pow(boy / 100, 2);
    const genderData = hcCocukData[cinsiyet];
    
    const kiloRange = interpolateChildValue(yas, genderData.kilo);
    const boyRange = interpolateChildValue(yas, genderData.boy);
    const bmiRange = interpolateChildValue(yas, genderData.bmi);
    
    const pKilo = calculatePercentile(kilo, kiloRange);
    const pBoy = calculatePercentile(boy, boyRange);
    const pBmi = calculatePercentile(bmi, bmiRange);
    
    document.getElementById('hc-res-cp-kilo').innerText = pKilo;
    document.getElementById('hc-res-cp-boy').innerText = pBoy;
    document.getElementById('hc-res-cp-bmi').innerText = pBmi;

    const yorumBox = document.getElementById('hc-cp-yorum');
    const bmiNum = parseInt(pBmi.replace('%', '')) || (pBmi.includes('<') ? 1 : 99);
    
    let yorum = '';
    let bg = '';
    let color = '';

    if (bmiNum > 95) {
        yorum = '<strong>Obezite Riski:</strong> Çocuğunuzun VKI persentili %95\'in üzerinde. Sağlıklı beslenme ve aktivite planı için doktorunuza danışın.';
        bg = 'rgba(192, 54, 44, 0.1)';
        color = 'var(--hc-front-red)';
    } else if (bmiNum > 85) {
        yorum = '<strong>Fazla Kilolu:</strong> Çocuğunuzun kilosu boyuna göre biraz yüksek görünüyor (%85-%95 aralığı).';
        bg = 'rgba(201, 137, 5, 0.1)';
        color = 'var(--hc-front-gold)';
    } else if (bmiNum < 5) {
        yorum = '<strong>Düşük Kilolu:</strong> Çocuğunuzun kilosu yaş grubuna göre düşük görünüyor (%5 altı). Beslenme desteği gerekebilir.';
        bg = 'rgba(201, 137, 5, 0.1)';
        color = 'var(--hc-front-gold)';
    } else {
        yorum = '<strong>Normal Gelişim:</strong> Çocuğunuzun gelişimi ve kilosu boyuna göre ideal aralıktadır.';
        bg = 'rgba(15, 138, 95, 0.1)';
        color = 'var(--hc-front-green)';
    }

    yorumBox.innerHTML = yorum;
    yorumBox.style.background = bg;
    yorumBox.style.color = color;

    document.getElementById('hc-cocuk-persentil-result').classList.add('visible');
}

// Reuse percentile logic from previous module or define locally if needed
function calculatePercentile(val, range) {
    if (val < range[0]) return '< %3';
    if (val > range[2]) return '> %97';
    if (val <= range[1]) {
        const p = 3 + ((val - range[0]) / (range[1] - range[0])) * 47;
        return '%' + Math.round(p);
    } else {
        const p = 50 + ((val - range[1]) / (range[2] - range[1])) * 47;
        return '%' + Math.round(p);
    }
}
