Vue.config.devtools = true;

Vue.component('card', {
  template: `
    <div class="card-wrap"
      @mousemove="handleMouseMove"
      @mouseenter="handleMouseEnter"
      @mouseleave="handleMouseLeave"
      ref="card">
      <div class="card"
        :style="cardStyle">
        <div class="card-bg" :style="[cardBgTransform, cardBgImage]"></div>
        <div class="card-info">
          <slot name="header"></slot>
          <slot name="content"></slot>
        </div>
      </div>
    </div>`,
  mounted() {
    this.width = this.$refs.card.offsetWidth;
    this.height = this.$refs.card.offsetHeight;
  },
  props: ['dataImage'],
  data: () => ({
    width: 0,
    height: 0,
    mouseX: 0,
    mouseY: 0,
    mouseLeaveDelay: null
  }),
  computed: {
    mousePX() {
      return this.mouseX / this.width;
    },
    mousePY() {
      return this.mouseY / this.height;
    },
    cardStyle() {
      rX = this.mousePX * 30;
      rY = this.mousePY * -30;
      if(screen.width/screen.height < 0.5) { rY = 0;}
      return {
        transform: `rotateY(${Math.sign(rX)*(Math.min(10, Math.abs(rX)))}deg) rotateX(${Math.sign(rY)*(Math.min(10, Math.abs(rY)))}deg)`
      };
    },
    cardBgTransform() {
      tX = this.mousePX * -40;
      tY = this.mousePY * -40;
      if(screen.width/screen.height < 0.5) { tY = 0;}
      return {
        transform: `translateX(${Math.sign(tX)*(Math.min(10, Math.abs(tX)))}px) translateY(${Math.sign(tY)*(Math.min(10, Math.abs(tY)))}px)`
      }
    },
    cardBgImage() {
      return {
        backgroundImage: `url(${this.dataImage})`
      }
    }
  },
  methods: {
    handleMouseMove(e) {
      this.mouseX = e.pageX - this.$refs.card.offsetLeft - this.width/2;
      this.mouseY = e.pageY - this.$refs.card.offsetTop - this.height/2;
    },
    handleMouseEnter() {
      clearTimeout(this.mouseLeaveDelay);
    },
    handleMouseLeave() {
      this.mouseLeaveDelay = setTimeout(()=>{
        this.mouseX = 0;
        this.mouseY = 0;
      }, 1000);
    }
  }
});

const app = new Vue({
  el: '#app'
});