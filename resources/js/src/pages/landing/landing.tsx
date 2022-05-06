import { Box } from "@chakra-ui/react";
import React from "react";
import { Intro } from "../sections/intro";
import { Services } from "../sections/services";
import { Commitments } from "../sections/commitments";

export const Landing = () => {
    return (<Box>
        <Intro />
        <Services />
        <Commitments />
    </Box>
    );
};