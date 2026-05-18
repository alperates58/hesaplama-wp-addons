let hcReactState = 'idle'; // idle, waiting, ready, done
let hcReactStartTime = 0;
let hcReactTimeout = null;
let hcReactRounds = [];
let hcReactBest = Infinity;

function hcReactionBoxClick() {
    const box = document.getElementById('hc-reaction-box');
    const text = document.getElementById('hc-reaction-text');
    const roundLabel = document.getElementById('hc-react-round');

    if (hcReactState === 'idle') {
        // Start round
        hcStartNextReactionRound();
    } else if (hcReactState === 'waiting') {
        // Clicked too early (false start)
        clearTimeout(hcReactTimeout);
        hcReactState = 'idle';
        box.className = 'hc-reaction-box early';
        text.innerText = 'Çok Erken Tıkladınız! Tekrar başlamak için tıklayın.';
    } else if (hcReactState === 'ready') {
        // Successful reaction
        const endTime = performance.now();
        const duration = Math.round(endTime - hcReactStartTime);
        hcReactRounds.push(duration);

        if (duration < hcReactBest) {
            hcReactBest = duration;
            document.getElementById('hc-react-best').innerText = duration + ' ms';
        }

        // Update individual round display
        const roundNum = hcReactRounds.length;
        document.getElementById(`hc-react-r${roundNum}-val`).innerText = duration + ' ms';
        roundLabel.innerText = `${roundNum} / 3`;

        if (roundNum < 3) {
            hcReactState = 'idle';
            box.className = 'hc-reaction-box success';
            text.innerText = `${duration} ms! Bir sonraki tur için tıklayın.`;
        } else {
            hcReactState = 'done';
            box.className = 'hc-reaction-box success';
            text.innerText = 'Test Tamamlandı!';
            
            // Calculate average
            const sum = hcReactRounds.reduce((a, b) => a + b, 0);
            const avg = Math.round(sum / 3);

            document.getElementById('hc-react-avg-val').innerText = avg + ' ms';
            document.getElementById('hc-reaksiyon-suresi-result').classList.add('visible');
        }
    } else if (hcReactState === 'done') {
        // Already completed
    }
}

function hcStartNextReactionRound() {
    const box = document.getElementById('hc-reaction-box');
    const text = document.getElementById('hc-reaction-text');

    hcReactState = 'waiting';
    box.className = 'hc-reaction-box waiting';
    text.innerText = 'KIRMIZI: Hazırlanın ve bekleyin...';

    const randomDelay = 2000 + Math.random() * 3000; // 2 to 5 seconds

    hcReactTimeout = setTimeout(() => {
        hcReactState = 'ready';
        hcReactStartTime = performance.now();
        box.className = 'hc-reaction-box ready';
        text.innerText = 'YEŞİL: ŞİMDİ TIKLA!';
    }, randomDelay);
}

function hcResetReactionTest() {
    hcReactRounds = [];
    hcReactBest = Infinity;
    hcReactState = 'idle';
    
    document.getElementById('hc-react-best').innerText = '-';
    document.getElementById('hc-react-round').innerText = '0 / 3';
    document.getElementById('hc-react-r1-val').innerText = '-';
    document.getElementById('hc-react-r2-val').innerText = '-';
    document.getElementById('hc-react-r3-val').innerText = '-';
    document.getElementById('hc-reaksiyon-suresi-result').classList.remove('visible');

    const box = document.getElementById('hc-reaction-box');
    const text = document.getElementById('hc-reaction-text');
    box.className = 'hc-reaction-box';
    text.innerText = 'Başlatmak İçin Tıklayın';
}
