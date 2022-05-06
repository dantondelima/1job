import { Box, Heading, Text } from "@chakra-ui/react";
import React from "react";

export const Footer = () => {
    return (
        <Box w="full" bg="whiteAlpha.400" px="300px" py="100px">
            <Heading
                color="brand.100"
                fontSize={32}
                letterSpacing="3px"
                textAlign="center"
            >Temos vagas em todo país<br />
            </Heading>
            <Text></Text>
        </Box>
    )
};