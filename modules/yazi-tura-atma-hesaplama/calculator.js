let hCount = 0;
let tCount = 0;

function hcCoinFlip() {
    const coin = document.getElementById('hc-cf-coin');
    const btn = document.getElementById('hc-cf-btn');
    
    btn.disabled = true;
    coin.style.animation = 'none';
    
    const isHeads = Math.random() < 0.5;
    
    setTimeout(() => {
        coin.style.animation = isHeads ? 'flip-heads 2s forwards' : 'flip-tails 2s forwards';
        
        setTimeout(() => {
            if (isHeads) hCount++; else tCount++;
            document.getElementById('hc-res-cf-heads').innerText = hCount;
            document.getElementById('hc-res-cf-tails').innerText = tCount;
            btn.disabled = false;
        }, 2000);
    }, 10);
}

function hcCoinFlipReset() {
    hCount = 0;
    tCount = 0;
    document.getElementById('hc-res-cf-heads').innerText = '0';
    document.getElementById('hc-res-cf-tails').innerText = '0';
}
