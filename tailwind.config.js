const colors = require('tailwindcss/colors')

module.exports = {
    important: true,
    theme: {
        screens: {
            sm: { max: "639px" },
            md: { max: "767px" },
            lg: { max: "1023px" },
            xl: { max: "1279px" }
        },
        fontFamily: {
            sans: ["Ubuntu", "Sans-serif"]
        },
        extend: {
            spacing: {
                "72": "18rem",
                "84": "21rem",
                "96": "24rem",
                "1/12":"8.333333%",
                "2/12":"16.666667%",
                "3/12":"25%",
                "4/12":"33.333333%",
                "5/12":"41.666667%",
                "6/12":"50%",
                "7/12":"58.333333%",
                "8/12":"66.666667%",
                "9/12":"75%",
                "10/12":"83.333333%",
                "11/12":"91.666667%"
            },
            minHeight:{
                "1/12":"8.333333%",
                "2/12":"16.666667%",
                "3/12":"25%",
                "4/12":"33.333333%",
                "5/12":"41.666667%",
                "6/12":"50%",
                "7/12":"58.333333%",
                "8/12":"66.666667%",
                "9/12":"75%",
                "10/12":"83.333333%",
                "11/12":"91.666667%"
            },
            inset: {
                "1/2": "50%",
                "2": "0.5rem",
                "4": "1rem",
                "8": "1.5rem"
            },
            outline: {
                "dash-gray": "2px solid #4B5563",
                "dash-black": "2px solid #000000"
            },
            colors: {
                indigo: colors.indigo,
                teal: colors.teal,
                lime: colors.lime,
                orange: colors.orange,
            },
        }
    },
    variants: {
        padding: ["hover"],
        transitions: ["responsive", "before", "after", "hover", "focus"],
        lineClamp: ["responsive", "hover"],
        cursor: ["hover"],
        inset: ["hover"],
        visibility: ["hover"],
        zIndex: ["responsive", "hover", "focus"],
        display: ["responsive", "group-hover", "group-focus"],
        border:["hover"]
    },
    plugins: [
        require('@tailwindcss/forms'),
        require("@tailwindcss/line-clamp"),
        require('tailwindcss-animations'),
        require("tailwindcss-animatecss")({
            settings: {
                animatedSpeed: 1000,
                heartBeatSpeed: 1000,
                hingeSpeed: 2000,
                bounceInSpeed: 750,
                bounceOutSpeed: 750,
                animationDelaySpeed: 1000
            },
            variants: ["responsive"]
        })
    ],
    corePlugins: {
        // ...
        textOverflow: true
    }
};
