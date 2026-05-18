function hcPnömatikSilindirKuvvetiHesapla() {
    const dPiston = parseFloat(document.getElementById('hc-pn-piston').value); // mm
    const dRod = parseFloat(document.getElementById('hc-pn-rod').value); // mm
    const bar = parseFloat(document.getElementById('hc-pn-pressure').value); // Bar
    const efficiency = parseFloat(document.getElementById('hc-pn-efficiency').value) || 85;

    if (isNaN(dPiston) || isNaN(dRod) || isNaN(bar) || dPiston <= 0 || dRod < 0 || bar <= 0) {
        alert('Lütfen geçerli ve pozitif silindir çapı ve basınç giriniz.');
        return;
    }

    if (dRod >= dPiston) {
        alert('Mil çapı, piston çapından büyük veya eşit olamaz.');
        return;
    }

    // Basınç Bar -> N/mm2 (1 Bar = 0.1 N/mm2)
    const P = bar * 0.1;

    // Alanlar (mm2)
    const aPiston = (Math.PI * Math.pow(dPiston, 2)) / 4;
    const aRod = (Math.PI * Math.pow(dRod, 2)) / 4;
    const aEffectivePull = aPiston - aRod;

    // Teorik Kuvvetler (Newton)
    const fPushTheo = aPiston * P;
    const fPullTheo = aEffectivePull * P;

    // Pratik Kuvvetler (Newton)
    const effFactor = efficiency / 100;
    const fPushPrac = fPushTheo * effFactor;
    const fPullPrac = fPullTheo * effFactor;

    // Newton -> kgf (1 kgf = 9.80665 N)
    const g = 9.80665;
    const fPushKgf = fPushPrac / g;
    const fPullKgf = fPullPrac / g;

    document.getElementById('hc-pn-f-push-theo').innerText = fPushTheo.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' N';
    document.getElementById('hc-pn-f-push-prac').innerText = fPushPrac.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' N';
    document.getElementById('hc-pn-f-push-kgf').innerText = fPushKgf.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kgf';

    document.getElementById('hc-pn-f-pull-theo').innerText = fPullTheo.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' N';
    document.getElementById('hc-pn-f-pull-prac').innerText = fPullPrac.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' N';
    document.getElementById('hc-pn-f-pull-kgf').innerText = fPullKgf.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kgf';

    document.getElementById('hc-pnomatik-silindir-kuvveti-result').classList.add('visible');
}
