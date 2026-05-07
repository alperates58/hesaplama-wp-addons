/**
 * Simplified WHO Growth Data (Median and standard deviations for Boys and Girls)
 * Interpolated for a better user experience.
 */
const hcBebekData = {
    erkek: {
        // kilo: [3rd, 50th, 97th] for months 0, 3, 6, 9, 12, 18, 24, 30, 36
        kilo: {
            0: [2.5, 3.3, 4.4], 3: [5.0, 6.4, 8.0], 6: [6.4, 7.9, 9.8], 9: [7.2, 8.9, 11.0],
            12: [7.7, 9.6, 12.0], 18: [8.8, 10.9, 13.7], 24: [9.7, 12.2, 15.3],
            30: [10.5, 13.3, 16.9], 36: [11.3, 14.3, 18.3]
        },
        boy: {
            0: [46, 50, 54], 3: [57, 61, 65], 6: [63, 67, 71], 9: [67, 72, 76],
            12: [71, 76, 81], 18: [76, 82, 88], 24: [81, 87, 93],
            30: [85, 92, 99], 36: [88, 96, 104]
        },
        bas: {
            0: [32, 35, 37], 3: [38, 40, 42], 6: [41, 43, 45], 9: [43, 45, 47],
            12: [44, 46, 48], 18: [45, 47, 50], 24: [46, 48, 51],
            30: [47, 49, 52], 36: [47, 50, 53]
        }
    },
    kadin: {
        kilo: {
            0: [2.4, 3.2, 4.2], 3: [4.6, 5.8, 7.5], 6: [5.8, 7.3, 9.2], 9: [6.6, 8.2, 10.4],
            12: [7.0, 8.9, 11.5], 18: [8.1, 10.2, 13.2], 24: [9.0, 11.5, 14.8],
            30: [9.8, 12.6, 16.4], 36: [10.6, 13.6, 17.8]
        },
        boy: {
            0: [45, 49, 53], 3: [55, 60, 64], 6: [61, 65, 70], 9: [65, 70, 75],
            12: [68, 74, 80], 18: [74, 80, 87], 24: [80, 86, 92],
            30: [83, 91, 98], 36: [87, 95, 103]
        },
        bas: {
            0: [31, 34, 36], 3: [37, 39, 41], 6: [40, 42, 44], 9: [41, 44, 46],
            12: [43, 45, 47], 18: [44, 46, 49], 24: [45, 47, 50],
            30: [46, 48, 51], 36: [46, 49, 52]
        }
    }
};

function interpolateValue(age, data) {
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

function calculatePercentile(val, range) {
    if (val < range[0]) return '< %3';
    if (val > range[2]) return '> %97';
    
    // Simple interpolation for demo purposes
    if (val <= range[1]) {
        const p = 3 + ((val - range[0]) / (range[1] - range[0])) * 47;
        return '%' + Math.round(p);
    } else {
        const p = 50 + ((val - range[1]) / (range[2] - range[1])) * 47;
        return '%' + Math.round(p);
    }
}

function hcBebekPersentilHesapla() {
    const cinsiyet = document.getElementById('hc-bp-cinsiyet').value;
    const ay = parseInt(document.getElementById('hc-bp-ay').value);
    const kilo = parseFloat(document.getElementById('hc-bp-kilo').value);
    const boy = parseFloat(document.getElementById('hc-bp-boy').value);
    const bas = parseFloat(document.getElementById('hc-bp-bas').value);

    if (isNaN(ay) || isNaN(kilo) || isNaN(boy)) {
        alert('Lütfen geçerli ay, kilo ve boy değerlerini giriniz.');
        return;
    }

    if (ay < 0 || ay > 36) {
        alert('Bu araç 0-36 ay arası bebekler içindir.');
        return;
    }

    const genderData = hcBebekData[cinsiyet];
    
    const kiloRange = interpolateValue(ay, genderData.kilo);
    const boyRange = interpolateValue(ay, genderData.boy);
    
    const pKilo = calculatePercentile(kilo, kiloRange);
    const pBoy = calculatePercentile(boy, boyRange);
    
    document.getElementById('hc-res-p-kilo').innerText = pKilo;
    document.getElementById('hc-res-p-boy').innerText = pBoy;

    if (!isNaN(bas)) {
        const basRange = interpolateValue(ay, genderData.bas);
        const pBas = calculatePercentile(bas, basRange);
        document.getElementById('hc-res-p-bas').innerText = pBas;
        document.getElementById('hc-res-p-bas-group').style.display = 'flex';
    } else {
        document.getElementById('hc-res-p-bas-group').style.display = 'none';
    }

    const yorumBox = document.getElementById('hc-bp-yorum');
    let yorum = '';
    let bg = '';
    let color = '';

    const kiloNum = parseInt(pKilo.replace('%', '')) || (pKilo.includes('<') ? 1 : 99);
    
    if (kiloNum < 10 || kiloNum > 90) {
        yorum = '<strong>Dikkat:</strong> Bebeğinizin gelişimi sınır değerlere yakın görünüyor. Düzenli çocuk doktoru kontrollerinizi aksatmamalısınız.';
        bg = 'rgba(201, 137, 5, 0.1)';
        color = 'var(--hc-front-gold)';
    } else {
        yorum = '<strong>Normal Gelişim:</strong> Bebeğinizin gelişimi standart eğriler içerisinde seyrediyor. Tebrikler!';
        bg = 'rgba(15, 138, 95, 0.1)';
        color = 'var(--hc-front-green)';
    }

    yorumBox.innerHTML = yorum;
    yorumBox.style.background = bg;
    yorumBox.style.color = color;

    document.getElementById('hc-bebek-persentil-result').classList.add('visible');
    
    if (window.innerWidth < 480) {
        document.getElementById('hc-bebek-persentil-result').scrollIntoView({ behavior: 'smooth' });
    }
}
