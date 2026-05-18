function hcN3SysChange() {
    const sys = document.getElementById('hc-n3-sys').value;
    document.getElementById('hc-n3-recoil-fields').style.display = sys === 'recoil' ? 'block' : 'none';
    document.getElementById('hc-n3-push-fields').style.display = sys === 'push' ? 'block' : 'none';
}

function hcNewtonUnUcuncuYasasıHesapla() {
    const sys = document.getElementById('hc-n3-sys').value;
    
    let actionForce = 0;
    let reactionForce = 0;
    let resultValStr = '';
    let description = '';

    if (sys === 'recoil') {
        const mLauncher = parseFloat(document.getElementById('hc-n3-m-launcher').value);
        const mBulletG = parseFloat(document.getElementById('hc-n3-m-bullet').value);
        const vBullet = parseFloat(document.getElementById('hc-n3-v-bullet').value);

        if (isNaN(mLauncher) || isNaN(mBulletG) || isNaN(vBullet) || mLauncher <= 0 || mBulletG <= 0 || vBullet < 0) {
            alert('Lütfen tüm değerleri pozitif olarak doldurunuz.');
            return;
        }

        const mBullet = mBulletG / 1000; // gram -> kg

        // Geri tepme hızı: v_recoil = - (m_bullet * v_bullet) / m_launcher
        const vRecoil = (mBullet * vBullet) / mLauncher;

        // Fırlatma itmesi (impulse) = m_bullet * v_bullet (N s)
        const impulse = mBullet * vBullet;

        resultValStr = `Geri Tepme Hızı: -${vRecoil.toLocaleString('tr-TR', { maximumFractionDigits: 3 })} m/s`;
        actionForce = impulse; // Ns cinsinden momentum değişimi
        reactionForce = -impulse;
        
        description = `Newton'un 3. Yasası gereği, mermiye uygulanan itme momentumu (Etki: ${impulse.toLocaleString('tr-TR')} kg·m/s), fırlatıcıya eşit büyüklükte ve zıt yönde bir momentum kazandırır (Tepki).`;
    } else {
        const m1 = parseFloat(document.getElementById('hc-n3-p1-m').value);
        const m2 = parseFloat(document.getElementById('hc-n3-p2-m').value);
        const force = parseFloat(document.getElementById('hc-n3-push-force').value);

        if (isNaN(m1) || isNaN(m2) || isNaN(force) || m1 <= 0 || m2 <= 0 || force < 0) {
            alert('Lütfen tüm kütle ve kuvvet değerlerini pozitif olarak giriniz.');
            return;
        }

        // İtme anındaki ivmeler
        const a1 = force / m1;
        const a2 = force / m2;

        resultValStr = `İvme 1: ${a1.toLocaleString('tr-TR', { maximumFractionDigits: 2 })} m/s² | İvme 2: -${a2.toLocaleString('tr-TR', { maximumFractionDigits: 2 })} m/s²`;
        actionForce = force;
        reactionForce = -force;

        description = `Kişiler birbirini ${force.toLocaleString('tr-TR')} N kuvvetle ittiğinde, her iki kişi de zıt yönlerde ivmelenir. Daha hafif olan 2. kişi daha büyük bir ivme (${a2.toLocaleString('tr-TR')} m/s²) kazanır.`;
    }

    document.getElementById('hc-n3-val').innerText = resultValStr;
    document.getElementById('hc-n3-f-action').innerText = actionForce.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-n3-f-reaction').innerText = reactionForce.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-n3-desc-val').innerHTML = description;

    document.getElementById('hc-newton-un-ucuncu-yasasi-result').classList.add('visible');
}
