function hcSiyahCisimIsismasiHesapla() {
    var tType = document.getElementById('hc-sci-t-type').value;
    var rawT = parseFloat(document.getElementById('hc-sci-t').value);

    if (isNaN(rawT)) {
        alert('Lütfen geçerli bir sıcaklık değeri girin.');
        return;
    }

    var T = rawT;
    if (tType === 'c') {
        T = rawT + 273.15;
    }

    if (T <= 0) {
        alert('Sıcaklık mutlak sıfırdan (0 K) yüksek olmalıdır.');
        return;
    }

    // Wien's constant: b = 2.897771955e-3 m.K
    var b = 2.897771955e-3;
    var lambda = b / T; // meters
    var lambdaNm = lambda * 1e9; // nanometers

    // Stefan-Boltzmann constant: sigma = 5.670374419e-8 W/m2.K4
    var sigma = 5.670374419e-8;
    var I = sigma * Math.pow(T, 4); // W/m2

    // Spectrum classification
    var spec = '';
    if (lambdaNm < 10) {
        spec = 'Gama veya X-Işını (Son Derece Enerjik)';
    } else if (lambdaNm < 400) {
        spec = 'Ultraviyole (UV - Morötesi)';
    } else if (lambdaNm >= 400 && lambdaNm <= 750) {
        // Visible light colors
        if (lambdaNm < 450) spec = 'Görünür Işık (Mor)';
        else if (lambdaNm < 495) spec = 'Görünür Işık (Mavi/Turkuaz)';
        else if (lambdaNm < 570) spec = 'Görünür Işık (Yeşil)';
        else if (lambdaNm < 590) spec = 'Görünür Işık (Sarı)';
        else if (lambdaNm < 620) spec = 'Görünür Işık (Turuncu)';
        else spec = 'Görünür Işık (Kırmızı)';
    } else if (lambdaNm <= 1e6) {
        spec = 'Kızılötesi (IR - Isıl Işıma)';
    } else {
        spec = 'Mikrodalga veya Radyo Dalgaları';
    }

    document.getElementById('hc-sci-res-lambda').innerText = lambdaNm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' nm';
    document.getElementById('hc-sci-res-spec').innerText = spec;
    document.getElementById('hc-sci-res-power').innerText = I.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' W/m²';

    var desc = T.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' K (' + (T - 273.15).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' °C) sıcaklığındaki bir kara cisim, en yoğun ışınımını ' + lambdaNm.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' nm tepe dalga boyunda gerçekleştirir. Bu dalga boyu elektromanyetik tayfta "' + spec + '" bölgesine denk gelir. Cismin birim yüzeyinden uzaya yayılan toplam güç saniyede metrekare başına ' + I.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Watt\'tır.';
    document.getElementById('hc-sci-desc').innerText = desc;

    document.getElementById('hc-siyah-cisim-isismasi-hesaplama-result').classList.add('visible');
}
